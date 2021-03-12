<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
       abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles','media'])->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');
        $accounts = Account::all();
        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user', 'accounts'));
    }

    public function update(Request $request, User $user)
    {
        $user->account_id = $request->account_id;
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('photo', false)) {
            if (!$user->photo || $request->input('photo') !== $user->photo->file_name) {
                if ($user->photo) {
                    $user->photo->delete();
                }

                $user->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
        }
         if($user->id == auth::user()->id)
         {
            return back()->with('updated','Success');
         }
         else
         {
            return redirect()->route('admin.users.index');
         }
       
    }

    public function selfUpdate(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update($request->all());

        return back();
             
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');
        $payments = Payment::where('account_id',$user->account_id)->orderBy('id','DESC')->limit(12)->get();
        $account_name = Account::where('id',$user->account_id)->value('account_name');

        return view('admin.users.show', compact('user','payments','account_name'));
        //return compact('account_name');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function attach(Request $request, Account $account)
    {
        $user = User::find($request->user_id);
        $user->account_id = $request->account_id;
        $user->update();

        return back();
    }

    public function changePassword(Request $request)
    { 
        $passchecker = "active";
        $homechecker = "";
        if(!(Hash::check($request->get('current_password'), Auth::user()->password)))
        { 
            $message = 'wrong current password';
            return back()->with('error', $message)->with('passchecker', $passchecker)->with('homechecker', $homechecker);
        }

        if(strcmp($request->get('password'), $request->get('current_password'))==0 )
        { 
            $message = 'New password can not be same as Old Password';
            return back()->with('match', $message)->with('passchecker', $passchecker)->with('homechecker', $homechecker);
        }

       if(strcmp($request->get('password'), $request->get('password_confirmation'))==0 )
        { 
            $user = Auth::user();
            $password = $request->get('password');
            $user->password = Hash::make($password);
            $user->update();
             
            $message = 'Password Changed Successfully';
            return back()->with('success', $message)->with('passchecker', $passchecker)->with('homechecker', $homechecker);
            
        }
        else
        {
            $message = 'Confirmation password does not match with New Password';
            return back()->with('mismatch', $message)->with('passchecker', $passchecker)->with('homechecker', $homechecker);
        }
    }

    //Change Profile
    public function changeProfile(Request $request, $id)
    {
        $user_id = $request->input('user_id');
        //Handle documents upload
         //Get document names with extension.
        if($request->hasFile('profile_picture'))
        {  
            $picturename = $request->file('profile_picture')->getClientOriginalName();
            $picturename_to_store = $user_id.'_'.$picturename;
        }
        else
        {
            $picturename = '';
            $picturename_to_store = '';
        }
        
             //Uploading the picture now
            if($request->hasFile('profile_picture'))
            {
                $path1 = $request->file('profile_picture')->storeAs('Profiles', $picturename_to_store);
            }
        $user = User::find($user_id);
        $user->img_name = $picturename_to_store;
        $user->update();
        
        return back();
    }

    public function getprofileForm()
    {
        return view('Admin.users.self_update_profile');
    }
}

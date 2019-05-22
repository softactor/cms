@extends('cms.layouts.app')
@section('content')


<link href="{{ asset('cmsp/css/register.css') }}" rel="stylesheet">
<div class="container register-form">
    <div class="form" >
        <div class="note">
            <p>Register New User Acount.</p>
        </div>
        <?php if ($flash_message = Session::get('error')) { ?>

            <div class="alert alert-danger"><?php echo $flash_message; ?></div>
            <?php
        }
        ?>
        <?php if ($flash_message = Session::get('success')) { ?>

            <div class="alert alert-success"><?php echo $flash_message; ?></div>
            <?php
        }
        ?>
        <form action="{{$url['url']}}" method="post">
            @csrf
            <div class="form-content">
                <div class="row">
                    <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
                        <img src='url(public/cmsp/images/circle-3.gif)' width="64" height="64" /><br>Loading..</div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter  name *" value=""/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" value=""/>
                        </div>
                           <div class="form-group">
                          
                            <label>User Specialist</label> (optional)
                            <input type="text" class="form-control" name="password" placeholder="" value=""/>
                     
                        </div>
                        <p><strong style="color: red"> NOTE:</strong> please enter user specialist if it is Engineer</p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>

                            <select class="form-control" name="role">
                                @foreach($query as $querys)
                                <option value="{{$querys->roles_id}}">
                                    {{$querys->role_name}}
                                </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" value=""/>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="cp"placeholder="Confirm Password *" value=""/>
                        </div>
                     
                    </div>
                </div>
                <button type="submit" class="btnSubmit">Submit</button>

            </div>
        </form>
    </div>  

</div>
@endsection
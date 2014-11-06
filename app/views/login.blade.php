@extends( 'master' )
@section( 'content' )
<section id="login">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-wrap">
				<h1>Login with your username</h1>
				{{ Form::open(array('id' => 'login')) }}
				<div class="form-group has-feedback">
					{{ Form::text( 'username', $value = null, array('class' => 'form-control username-input', 'placeholder' => 'Username')) }}
				</div>
				<div class="form-group has-feedback">
					{{ Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Password')) }}
				</div>
					{{ Form::submit('Log in', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-login' )) }}
				{{ Form::close() }}
				<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
				<a href="javascript:;" class="signup" data-toggle="modal" data-target=".signup-modal">Not registered? Sign up!</a>
			</div>
		</div>
	</div>
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<div class="modal fade signup-modal" tabindex="-1" role="dialog" aria-labelledby="mySignupModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Create Your Account</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="{{asset('user')}}">
					<div class="form-group has-feedback">
						<input type="text" name="username" id="signup-username" class="form-control username-input" autocomplete="off" placeholder="Username">
					</div>
					<div class="form-group has-feedback">
						<input type="text" name="password" id="signup-password" class="form-control" autocomplete="off" placeholder="Password">
					</div>
					<div class="form-group has-feedback">
						<input type="email" name="email" id="signup-email" class="form-control" autocomplete="off" placeholder="Email">
					</div>
					<button type="submit" class="btn btn-custom signup-button center-block">Sign Up</button>
				</form>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@stop
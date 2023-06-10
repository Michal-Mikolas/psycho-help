@extends('layout')


@section('content')

	{{--
	###
		#  #    # ######  ####
		#  ##   # #      #    #
		#  # #  # #####  #    #
		#  #  # # #      #    #
		#  #   ## #      #    #
	### #    # #       ####
	--}}
	<div class="card card-side shadow-xl mb-8 text-info-content bg-info">
		<div class="card-body">
			<h2 class="card-title">
				{{-- <i class="fa-solid fa-circle-info pr-1"></i> --}}
				How does it work?
			</h2>
			<ol>
				<li>Write about your troubles into the box below. Also choose a password.</li>
				<li>You will get secret link where you can access the conversation later.</li>
				<li>When psychologist responds to you, you will see it there. </li>
			</ol>

			<span>
				<i class="fa-solid fa-shield-heart"></i>
				Everything is completely anonymous. You don't need to write any contacts here. All the conversation is done through the secret link and password you choose at the beginning. <strong>Not even the psychologist knows who he is speaking to.</strong>
			</span>
		</div>
	</div>

	{{--
	#     #
	##   ## ######  ####   ####    ##    ####  ######  ####
	# # # # #      #      #       #  #  #    # #      #
	#  #  # #####   ####   ####  #    # #      #####   ####
	#     # #           #      # ###### #  ### #           #
	#     # #      #    # #    # #    # #    # #      #    #
	#     # ######  ####   ####  #    #  ####  ######  ####
	--}}
	<div class="write">
		<form action="{{route('store')}}" method="POST">
			@csrf
			<textarea name="message" placeholder="What troubles are you experiencing?"
				class="textarea textarea-bordered textarea-primary textarea-sm text-lg text-md w-full leading-normal"
				rows="4"
			></textarea>

			<input name="password" type="password" placeholder="Your secret password"
				class="input input-sm input-bordered w-full max-w-xs"
			/>
			{{-- <input name="password_check" type="password" placeholder="Password again"
				class="input input-sm input-bordered w-full max-w-xs"
			/> --}}

			<div class="text-right mt-2">
				<button class="btn btn-primary">
					<i class="fa-regular fa-paper-plane mr-1"></i>
					Send to psychologist
				</button>
			</div>
		</form>
	</div>

@endsection

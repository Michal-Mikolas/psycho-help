@extends('layout')


@section('content')
    {{--
	 #####
	#     # #    #   ##   #####
	#       #    #  #  #    #
	#       ###### #    #   #
	#       #    # ######   #
	#     # #    # #    #   #
	 #####  #    # #    #   #
	--}}
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full">
                <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png?w=740&t=st=1686413596~exp=1686414196~hmac=c6f884034d693a5d0261228b39ea1ede5d8e5fe54e3ca12ff817a30a1bcefd9e" />
            </div>
        </div>
        <div class="chat-header">
            {{-- Obi-Wan Kenobi --}}
            <time class="text-xs opacity-50">12:45</time>
        </div>
        <div class="chat-bubble chat-bubble-success">You were the Chosen One!</div>
    </div>

    <div class="chat chat-end">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full">
                <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png?w=740&t=st=1686413596~exp=1686414196~hmac=c6f884034d693a5d0261228b39ea1ede5d8e5fe54e3ca12ff817a30a1bcefd9e" />
            </div>
        </div>
        <div class="chat-header">
            {{-- Anakin --}}
            <time class="text-xs opacity-50">12:46</time>
        </div>
        <div class="chat-bubble chat-bubble-info">I hate you!</div>
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
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <textarea name="message" placeholder="What troubles are you experiencing?"
                class="textarea textarea-bordered textarea-primary textarea-sm text-lg text-md w-full leading-normal"
                rows="4"></textarea>

            <input name="password" type="password" placeholder="Your secret password"
                class="input input-sm input-bordered w-full max-w-xs" />
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

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
	@foreach ($thread->messages as $message)
        @if ($message->user_id)
            <div class="chat chat-start">
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img src="{{$message->user->image_url}}" />
                    </div>
                </div>
                <div class="chat-header">
                    {{$message->user->name}}
                    <time class="text-xs opacity-50">{{nice_dt($message->created_at)}}</time>
                </div>
                <div class="chat-bubble chat-bubble-success">{!! nl2br($message->message) !!}</div>
            </div>
        @else
            {{-- Anonymous --}}
            <div class="chat chat-end">
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png?w=740&t=st=1686413596~exp=1686414196~hmac=c6f884034d693a5d0261228b39ea1ede5d8e5fe54e3ca12ff817a30a1bcefd9e" />
                    </div>
                </div>
                <div class="chat-header">
                    {{-- Anonymous --}}
                    <time class="text-xs opacity-50">{{nice_dt($message->created_at)}}</time>
                </div>
                <div class="chat-bubble chat-bubble-info">{!! nl2br($message->message) !!}</div>
            </div>
        @endif

		@if ($loop->index == 0)
            <div class="chat chat-start">
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://cdn-icons-png.flaticon.com/512/3529/3529365.png" />
                    </div>
                </div>
                <div class="chat-header">
                    Robot Owlie
                    <time class="text-xs opacity-50">{{nice_dt($message->created_at)}}</time>
                </div>
                <div class="chat-bubble chat-bubble-success">
					<p>Hello there!</p>
					<p>Thank you for sharing your thoughts with us. Someone will read your message and try to respond you here very soon. </p>
					<p class="mb-0">Meanwhile you can save this URL (so you can visit this page later): </p>
					<div class="code-block inline-block join mb-2">
						<code class="join-item">{{route('thread', ['key' => $thread->key])}}</code>
						<button class="copy btn btn-ghost btn-xs join-item" title="Copy to clipboard">
							<i class="fa-solid fa-copy"></i>
						</button>
						<button class="bookmark btn btn-ghost btn-xs join-item" title="Add to Bookmarks">
							<i class="fa-regular fa-bookmark"></i>
						</button>
					</div>
					<p>You can also activate notifications so your browser will alert you about new messages even if this page is closed:
						<button class="btn btn-outline btn-xs" title="Add to Bookmarks">
							<i class="fa-solid fa-bell pr-2"></i> Turn on notifications
						</button>.
					</p>
					<p>Anyway, see you soon!</p>
				</div>

				<div class="hidden tooltip"></div>
            </div>
		@endif
    @endforeach

    <!--
    <div class="chat chat-end">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full">
                <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png?w=740&t=st=1686413596~exp=1686414196~hmac=c6f884034d693a5d0261228b39ea1ede5d8e5fe54e3ca12ff817a30a1bcefd9e" />
            </div>
        </div>
        <div class="chat-header">
            {{-- Anakin --}}
            <time class="text-xs opacity-50">12:45</time>
        </div>
        <div class="chat-bubble chat-bubble-info">It's over Anakin, <br/>I have the high ground.</div>
    </div>

    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full">
                <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png?w=740&t=st=1686413596~exp=1686414196~hmac=c6f884034d693a5d0261228b39ea1ede5d8e5fe54e3ca12ff817a30a1bcefd9e" />
            </div>
        </div>
        <div class="chat-header">
            Anakin
            <time class="text-xs opacity-50">12:46</time>
        </div>
        <div class="chat-bubble chat-bubble-success">You underestimate my power!</div>
    </div>

    <div class="chat chat-end">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full">
                <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png?w=740&t=st=1686413596~exp=1686414196~hmac=c6f884034d693a5d0261228b39ea1ede5d8e5fe54e3ca12ff817a30a1bcefd9e" />
            </div>
        </div>
        <div class="chat-header">
            {{-- Anakin --}}
            <time class="text-xs opacity-50">12:47</time>
        </div>
        <div class="chat-bubble chat-bubble-info">It was said that you would, destroy the Sith, not join them.</div>
    </div>
    -->

	{{-- <div class="mt-4 text-xs opacity-50 italic">The psychologist will respond soon. Just come back here from time to time...</div> --}}

    {{--
	#     #
	##   ## ######  ####   ####    ##    ####  ######  ####
	# # # # #      #      #       #  #  #    # #      #
	#  #  # #####   ####   ####  #    # #      #####   ####
	#     # #           #      # ###### #  ### #           #
	#     # #      #    # #    # #    # #    # #      #    #
	#     # ######  ####   ####  #    #  ####  ######  ####
	--}}
    <div class="write mt-8">
        <form action="{{ route('store', ['key' => $thread->key]) }}" method="POST">
            @csrf
            <textarea name="message" placeholder="Your message..."
                class="textarea textarea-bordered textarea-primary textarea-sm text-lg text-md w-full leading-normal"
                rows="4"></textarea>

            <div class="text-right mt-2">
                <button class="btn btn-primary">
                    <i class="fa-regular fa-paper-plane mr-1"></i>
                    Reply
                </button>
            </div>
        </form>
    </div>
@endsection


@section('tail')
<script type="text/javascript">
jQuery(function($){
	var toClipboard = function(){
		var $this = $(this).parent();
		$this.attr('data-tip', 'Coppied to clipboard');
		$this.addClass('tooltip tooltip-open');
		setTimeout(function(){
			$this.removeClass('tooltip tooltip-open');
		}, 2000);
	};
	$('.code-block code').click(toClipboard);
	$('.code-block button.copy').click(toClipboard);
});
</script>
@endsection

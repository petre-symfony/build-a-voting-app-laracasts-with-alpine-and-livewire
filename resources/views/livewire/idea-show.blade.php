<div>
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2">
                <a href="">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="h-14 w-14 rounded-xl">
                </a>
            </div>
            <div class="mx-2 md:mx-4 w-full">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">
                    {{ $idea->title }}
                </h4>
                <div class="text-gray-600 mt-3">
                    {{ $idea->description }}
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffforHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div
                        x-data = "{ isOpen: false}"
                        class="flex items-center space-x-2 mt-4 md:mt-0"
                    >
                        <div
                            class="{{ $idea->status->classes }} text-xxs font-bold uppercase
                                    leading-none rounded-full text-center w-28
                                    h-7 py-2 px-4
                                "
                        >
                            {{ $idea->status->name }}
                        </div>
                        <button
                            @click="isOpen = !isOpen"
                            class="relative bg-gray-100 hover:bg-gray-200 border
                                transition duration-150 ease-in rounded-full h-7 py-2
                                px-4
                            "
                        >
                            <svg class="text-gray-400 h-full scale-150" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                            <ul
                                x-cloack
                                x-show="isOpen"
                                x-transition.origin.top.left.duration.150ms
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="absolute w-44 text-left ml-8 font-semibold
                                    bg-white shadow-dialog rounded-xl py-3
                                    md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10
                                "
                            >
                                <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Mark as spam</a></li>
                                <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Delete Post</a></li>
                            </ul>
                        </button>
                    </div>
                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none  @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        @if ($hasVoted)
                            <button
                                wire:click.prevent="vote"
                                class="w-20 bg-blue text-white border border-blue hover:bg-blue-hover
                                    transition duration-150 ease-in font-bold text-xxs text-white uppercase
                                    rounded-xl px-4 py-3 -mx-5
                                "
                            >Voted</button>
                        @else
                            <button
                                wire:click.prevent="vote"
                                class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400
                                    transition duration-150 ease-in font-bold text-xxs text-white uppercase
                                    rounded-xl px-4 py-3 -mx-5
                                "
                            >Vote</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end idea-container -->
    <div class="buttons-container flex items-center justify-between md:ml-6">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
            <div
                x-data = "{ isOpen: false}"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center h-11 w-32
                        text-sm text-white bg-blue font-semibold rounded-xl
                        border border-blue hover:bg-blue-hover
                        transition duration-150 ease-in px-6 py-3
                    "
                >
                    Reply
                </button>
                <div
                    x-cloack
                    x-show="isOpen"
                    x-transition.origin.top.left.duration.150ms
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm
                        bg-white shadow-dialog rounded-xl mt-5
                    "
                >
                    <form action="" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea
                                name="post_comment" id="post_comment" cols="10" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Go ahead, don't be shy, share your thoughts..."
                            ></textarea>

                            <div class="flex flex-col md:flex-row items-center md:space-x-3">
                                <button
                                    type="button"
                                    class="flex items-center justify-center h-11 w-full md:w-1/2
                                        text-sm text-white bg-blue font-semibold rounded-xl
                                        border border-blue hover:bg-blue-hover
                                        transition duration-150 ease-in px-6 py-3
                                    "
                                >
                                    Post Comment
                                </button>
                                <button
                                    type="button"
                                    class="flex items-center justify-center w-full md:w-32 h-11
                                    text-xs bg-gray-200 font-semibold rounded-xl
                                    border border-gray-200 hover:border-gray-400
                                    transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0
                                "
                                >
                                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @auth
                @if (auth()->user()->isAdmin())
                <livewire:set-status :idea="$idea"/>
                @endif
            @endauth
        </div>

        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            @if ($hasVoted)
                <button
                    wire:click.prevent="vote"
                    type="button"
                    class="h-11 w-32 uppercase
                        text-xs bg-blue text-white font-semibold rounded-xl
                        border border-blue hover:bg-blue-hover
                        transition duration-150 ease-in px-6 py-3
                    "
                >
                    <span>Voted</span>
                </button>
            @else
                <button
                    type="button"
                    wire:click.prevent="vote"
                    class="h-11 w-32 uppercase
                        text-xs bg-gray-200 font-semibold rounded-xl
                        border border-gray-200 hover:border-gray-400
                        transition duration-150 ease-in px-6 py-3
                    "
                >
                    <span>Vote</span>
                </button>
            @endif
        </div>
    </div><!-- end buttons-container -->
</div>

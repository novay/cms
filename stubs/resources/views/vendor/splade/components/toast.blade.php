<SpladeToast v-bind:auto-dismiss="@json($autoDismiss)" #default="toast">
    <x-splade-component is="transition" appear show="toast.show">
        <x-splade-component is="transition" child after-leave="toast.emitDismiss">
            <div @click.prevent="toast.setShow(false)" @class([
                'p-3.5 pointer-events-auto shadow-md min-w-[240px] flex items-center gap-1.5 rounded-lg',
                'bg-green-50 border-green-400' => $isSuccess,
                'bg-yellow-50 border-yellow-400' => $isWarning,
                'bg-red-50 border-red-400' => $isDanger,
                'bg-black border-blue-400' => $isInfo,
            ])>
                <div class="flex">
                    <div class="flex-shrink-0">
                        @if($isSuccess)
                            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        @elseif($isWarning)
                            <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        @elseif($isDanger)
                            <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        @elseif($isInfo)
                            <Icon icon="mingcute:safe-alert-line" class="h-6 w-6 text-white text-2xl" />
                        @endif
                    </div>
                    <div class="ml-2 me-2 break-words">
                        <h3 @class([
                            'text-green-800' => $isSuccess,
                            'text-orange-800' => $isWarning,
                            'text-red-800' => $isDanger,
                            'text-white' => $isInfo,
                        ])>
                           {!! nl2br(e($title ?: $message)) !!}
                        </h3>

                        @if($title && $message)
                            <div @class([
                                'mt-2',
                                'text-green-700' => $isSuccess,
                                'text-orange-700' => $isWarning,
                                'text-red-700' => $isDanger,
                                'text-white' => $isInfo,
                            ])>
                                <p>{!! nl2br(e($message)) !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-splade-component>
    </x-splade-component>
</SpladeToast>
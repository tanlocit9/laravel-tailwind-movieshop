<div class="w-full flex items-center justify-center" x-data="modal()" x-cloak @open-ticket-edit.window="openModal()"
    @close-ticket-edit.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'fixed inset-0 z-10 flex items-center justify-center h-screen': open }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-5/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6"
                x-ref="myModal" x-show="open" x-transition:enter="ease-out duration-300" @click.away="closeModal()"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                @if($ticket)
                <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
                    <div class="flex justify-items-center items-center space-x-4 ">
                        <div class="flex flex-col w-1/2">
                            <label class="leading-relaxed">User name</label>
                            <input type="text" class="input-text sm:text-sm" value="{{$ticket->user->name}}" disabled>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label class="leading-relaxed">Total Price</label>
                            <input type="text" class="input-text sm:text-sm"
                                value="{{numfmt_format_currency(numfmt_create( 'vn_VN', NumberFormatter::CURRENCY ),  $ticket->total_price ,"VND")}}"
                                disabled>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex flex-col w-1/2">
                            <label class="leading-relaxed" for="payMode">Paymode</label>
                            <select id="payMode" class="input-text" required wire:model='payMode'>
                                @foreach ($payModes as $mode)
                                <option value="{{$mode->id}}" @if ($mode->id==$ticket->ticket_status_id)
                                    checked
                                    @endif>{{$mode->mode}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label class="leading-relaxed" for="status">Ticket status</label>
                            <select id="status" class="input-text" required wire:model='status'>
                                @foreach($statuses as $status)
                                <option value="{{$status->id}}" @if ($status->id==$ticket->ticket_status_id)
                                    checked
                                    @endif>{{$status->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full mx-auto py-4">
                    <button wire:click="save()" x-on:click="closeModal()"
                        class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                    <button x-on:click="closeModal()"
                        class="bg-red-500 hover:bg-red-700 focus:outline-none text-white font-bold py-2 px-4 rounded float-right">
                        Close
                    </button>
                </div>

                @endif
                <!-- End Title-->
                <!-- content -->

                <!--Footer-->
            </div>

            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>

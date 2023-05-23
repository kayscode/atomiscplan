<div class="grid grid-cols-10 items-center">
    <div class="col-span-2 font-bold text-indigo-500 text-xl text-center">
        Andia Career
    </div>
    <div class="col-span-8 flex justify-between items-center">
        @if(\Illuminate\Support\Facades\Auth::user()->employee)
            <div class="space-x-2 text-gray-500">
                <span class="text-lg font-semibold">
                    {{strtoupper(\Illuminate\Support\Facades\Auth::user()->employee->first_name)}}
                </span>
                <span class="text-lg font-semibold">
                    {{strtoupper(\Illuminate\Support\Facades\Auth::user()->employee->last_name)}}
                </span>
            </div>
        @endif
            <div>
                @if(\Illuminate\Support\Facades\Auth::user()->employee->profile_picture)
                    <img src="{{\Illuminate\Support\Facades\Auth::user()->employee->profile_picture}}" alt="">
                @else
                    <div class="text-center flex justify-center">
                        <span class="rounded-full text-md font-bold uppercase bg-indigo-200 block flex justify-center items-center h-12 w-12">
                            {{\Illuminate\Support\Facades\Auth::user()->employee->first_name[0]}} {{\Illuminate\Support\Facades\Auth::user()->employee->last_name[0]}}
                        </span>
                    </div>
                @endif
            </div>
    </div>
</div>

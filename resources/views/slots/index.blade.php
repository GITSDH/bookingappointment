<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('slots.index')" :active="request()->routeIs('slots.index')">
                {{ __('All Slots') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <h2 class="font-bold">Create New Slot</h2>
        <form method="POST" action="{{ route('slots.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4 flex gap-4">

                <div>
                    <x-input-label for="start" :value="__('Start Time')" />

                    <x-text-input id="start" class="block mt-1 w-full" type="time" name="start" :value="old('start')" required autofocus />

                    <x-input-error :messages="$errors->get('start')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="end" :value="__('End Time')" />

                    <x-text-input id="end" class="block mt-1 w-full" type="time" name="end" :value="old('end')" required autofocus />

                    <x-input-error :messages="$errors->get('end')" class="mt-2" />
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Create Slot') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <div class="p-6">
        <table id="locationTable" class="display stripe" style="width:100%">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#locationTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('slots.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'start',
                            name: 'start'
                        },
                        {
                            data: 'end',
                            name: 'end'
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}slots/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="locationDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


            function locationDelete(locationID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Slot ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'slots/'+locationID,
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    datatablelist.draw();
                                } else if (response.status == "error") {
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    datatablelist.draw();
                                }
                            }
                        });
                    }
                });
            }

        </script>
    </x-slot>
</x-app-layout>

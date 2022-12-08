<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('doctors.index')" :active="request()->routeIs('doctors.index')">
                {{ __('All Users') }}
            </x-nav-link>
            <x-nav-link :href="route('doctors.create')" :active="request()->routeIs('doctors.create')">
                {{ __('Add New Doctor') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 ">
        <form method="POST" action="{{ route('doctors.update',$user->id) }}">
            @csrf
            @method('PATCH')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}"
                    required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="photo" :value="__('Photo')" />
                <x-file-input type="file" id="photo" name="photo" :value="old('photo')" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Nationality -->
            <div class="mt-4">
                <x-input-label for="nationality" :value="__('Nationality')" />

                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" value="{{$user->docprofile->nationality}}"
                    required autofocus />

                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        <option class="capitalized" value="male" {{$user->docprofile->gender == 'male' ? 'selected' : ''}}>Male</option>
                        <option class="capitalized" value="female" {{$user->docprofile->gender == 'female' ? 'selected' : ''}}>Female</option>
                        <option class="capitalized" value="other" {{$user->docprofile->gender == 'other' ? 'selected' : ''}}>Other</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                <select id="language" name="language" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="AF">Afrikaans</option>
                    <option value="SQ">Albanian</option>
                    <option value="AR">Arabic</option>
                    <option value="HY">Armenian</option>
                    <option value="EU">Basque</option>
                    <option value="BN">Bengali</option>
                    <option value="BG">Bulgarian</option>
                    <option value="CA">Catalan</option>
                    <option value="KM">Cambodian</option>
                    <option value="ZH">Chinese (Mandarin)</option>
                    <option value="HR">Croatian</option>
                    <option value="CS">Czech</option>
                    <option value="DA">Danish</option>
                    <option value="NL">Dutch</option>
                    <option value="EN">English</option>
                    <option value="ET">Estonian</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finnish</option>
                    <option value="FR">French</option>
                    <option value="KA">Georgian</option>
                    <option value="DE">German</option>
                    <option value="EL">Greek</option>
                    <option value="GU">Gujarati</option>
                    <option value="HE">Hebrew</option>
                    <option value="HI">Hindi</option>
                    <option value="HU">Hungarian</option>
                    <option value="IS">Icelandic</option>
                    <option value="ID">Indonesian</option>
                    <option value="GA">Irish</option>
                    <option value="IT">Italian</option>
                    <option value="JA">Japanese</option>
                    <option value="JW">Javanese</option>
                    <option value="KO">Korean</option>
                    <option value="LA">Latin</option>
                    <option value="LV">Latvian</option>
                    <option value="LT">Lithuanian</option>
                    <option value="MK">Macedonian</option>
                    <option value="MS">Malay</option>
                    <option value="ML">Malayalam</option>
                    <option value="MT">Maltese</option>
                    <option value="MI">Maori</option>
                    <option value="MR">Marathi</option>
                    <option value="MN">Mongolian</option>
                    <option value="NE">Nepali</option>
                    <option value="NO">Norwegian</option>
                    <option value="FA">Persian</option>
                    <option value="PL">Polish</option>
                    <option value="PT">Portuguese</option>
                    <option value="PA">Punjabi</option>
                    <option value="QU">Quechua</option>
                    <option value="RO">Romanian</option>
                    <option value="RU">Russian</option>
                    <option value="SM">Samoan</option>
                    <option value="SR">Serbian</option>
                    <option value="SK">Slovak</option>
                    <option value="SL">Slovenian</option>
                    <option value="ES">Spanish</option>
                    <option value="SW">Swahili</option>
                    <option value="SV">Swedish </option>
                    <option value="TA">Tamil</option>
                    <option value="TT">Tatar</option>
                    <option value="TE">Telugu</option>
                    <option value="TH">Thai</option>
                    <option value="BO">Tibetan</option>
                    <option value="TO">Tonga</option>
                    <option value="TR">Turkish</option>
                    <option value="UK">Ukrainian</option>
                    <option value="UR">Urdu</option>
                    <option value="UZ">Uzbek</option>
                    <option value="VI">Vietnamese</option>
                    <option value="CY">Welsh</option>
                    <option value="XH">Xhosa</option>
                </select>
            </div>


            <div class="mt-4">
                <label for="speciality" class="block text-sm font-medium text-gray-700">Speciality</label>
                <select id="speciality" name="speciality"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    @foreach ($specialities as $item)
                        <option class="capitalized" value="{{ $item->id }}" {{$user->docprofile->speciality_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="hospital" class="block text-sm font-medium text-gray-700">Hospital</label>
                <select id="hospital" name="hospital"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    @foreach ($hospitals as $item)
                        <option class="capitalized" value="{{ $item->id }}" {{$user->docprofile->hospital_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <fieldset>
                    <p class="block text-sm font-medium text-gray-700">Select Active Slot</p>
                    <div class="mt-4 space-y-4 grid grid-cols-4">
                        @forelse ($slots as $item)
                        <div class="flex items-center">
                            <input id="push-{{$item->id}}" value="{{$item->id}}" name="slot_id" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" {{$user->docprofile->slot_id == $item->id ? 'checked' : ''}}>
                            <label for="push-{{$item->id}}" class="ml-3 block text-sm font-medium text-gray-700">{{$item->start.' - '.$item->end}}</label>
                        </div>
                        @empty
                        <p class="text-red-200">Please Create Slot First</p>
                        @endforelse
                    </div>
                </fieldset>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Update Doctor Information') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

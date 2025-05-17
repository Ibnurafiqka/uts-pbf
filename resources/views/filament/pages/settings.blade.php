<x-filament::page>
    <x-filament::section>
        <x-slot name="heading">
            {{ __('Profile Settings') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Manage your account profile information.') }}
        </x-slot>

        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Profile Photo -->
                <x-filament::section class="col-span-1">
                    <x-slot name="heading">
                        {{ __('Profile Photo') }}
                    </x-slot>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            @if ($profilePhoto)
                                <img src="{{ $profilePhoto->temporaryUrl() }}" alt="{{ __('Profile photo preview') }}" class="h-20 w-20 rounded-full object-cover">
                            @elseif ($user->profile_photo_path)
                                <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ __('Profile photo') }}" class="h-20 w-20 rounded-full object-cover">
                            @else
                                <div class="flex h-20 w-20 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                                    <x-filament::icon
                                        name="heroicon-o-user"
                                        class="h-10 w-10 text-gray-500 dark:text-gray-400"
                                    />
                                </div>
                            @endif
                        </div>

                        <div class="space-y-2">
                            <x-filament::button size="sm" type="button" tag="label" for="profile-photo" outlined>
                                {{ __('Upload photo') }}
                                <input
                                    id="profile-photo"
                                    type="file"
                                    wire:model="profilePhoto"
                                    class="sr-only"
                                    accept="image/jpg,image/jpeg,image/png"
                                />
                            </x-filament::button>

                            @if ($user->profile_photo_path)
                                <x-filament::button size="sm" color="danger" wire:click="deleteProfilePhoto" type="button" outlined>
                                    {{ __('Remove photo') }}
                                </x-filament::button>
                            @endif

                            @error('profilePhoto')
                                <p class="text-sm text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </x-filament::section>

                <!-- Personal Information -->
                <x-filament::section class="col-span-1">
                    <x-slot name="heading">
                        {{ __('Personal Information') }}
                    </x-slot>

                    <div class="space-y-4">
                        <x-filament::input.wrapper id="name" statePath="name" label="{{ __('Name') }}">
                            <x-filament::input.text id="name" wire:model.defer="name" />
                        </x-filament::input.wrapper>

                        <x-filament::input.wrapper id="email" statePath="email" label="{{ __('Email') }}">
                            <x-filament::input.text id="email" type="email" wire:model.defer="email" />
                        </x-filament::input.wrapper>
                    </div>
                </x-filament::section>
            </div>

            <!-- Contact Information -->
            <x-filament::section>
                <x-slot name="heading">
                    {{ __('Contact Information') }}
                </x-slot>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <x-filament::input.wrapper id="phone" statePath="phone" label="{{ __('Phone Number') }}">
                        <x-filament::input.text id="phone" wire:model.defer="phone" placeholder="{{ __('e.g. +62 812 3456 7890') }}" />
                    </x-filament::input.wrapper>

                    <x-filament::input.wrapper id="address" statePath="address" label="{{ __('Address') }}">
                        <x-filament::input.text id="address" wire:model.defer="address" />
                    </x-filament::input.wrapper>
                </div>
            </x-filament::section>

            <!-- Password Update -->
            <x-filament::section>
                <x-slot name="heading">
                    {{ __('Update Password') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </x-slot>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <x-filament::input.wrapper id="current_password" statePath="current_password" label="{{ __('Current Password') }}">
                        <x-filament::input.text id="current_password" type="password" wire:model.defer="current_password" autocomplete="current-password" />
                    </x-filament::input.wrapper>

                    <div></div>

                    <x-filament::input.wrapper id="password" statePath="password" label="{{ __('New Password') }}">
                        <x-filament::input.text id="password" type="password" wire:model.defer="password" autocomplete="new-password" />
                    </x-filament::input.wrapper>

                    <x-filament::input.wrapper id="password_confirmation" statePath="password_confirmation" label="{{ __('Confirm Password') }}">
                        <x-filament::input.text id="password_confirmation" type="password" wire:model.defer="password_confirmation" autocomplete="new-password" />
                    </x-filament::input.wrapper>
                </div>
            </x-filament::section>

            <!-- Additional Preferences -->
            <x-filament::section>
                <x-slot name="heading">
                    {{ __('Preferences') }}
                </x-slot>

                <div class="space-y-4">
                    <x-filament::input.wrapper id="language" statePath="language" label="{{ __('Language') }}">
                        <x-filament::input.select id="language" wire:model.defer="language">
                            <option value="en">{{ __('English') }}</option>
                            <option value="id">{{ __('Indonesian') }}</option>
                            <!-- Add more language options as needed -->
                        </x-filament::input.select>
                    </x-filament::input.wrapper>

                    <x-filament::input.wrapper id="timezone" statePath="timezone" label="{{ __('Timezone') }}">
                        <x-filament::input.select id="timezone" wire:model.defer="timezone">
                            <option value="Asia/Jakarta">{{ __('Asia/Jakarta (GMT+7)') }}</option>
                            <option value="UTC">{{ __('UTC') }}</option>
                            <!-- Add more timezone options as needed -->
                        </x-filament::input.select>
                    </x-filament::input.wrapper>
                </div>
            </x-filament::section>

            <!-- Two Factor Authentication -->
            <x-filament::section>
                <x-slot name="heading">
                    {{ __('Two Factor Authentication') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Add additional security to your account using two factor authentication.') }}
                </x-slot>

                <div class="flex items-center justify-between">
                    <div>
                        @if($twoFactorEnabled)
                            <span class="inline-flex items-center rounded-full bg-success-100 px-3 py-1 text-sm font-medium text-success-800 dark:bg-success-500/20 dark:text-success-400">
                                <x-filament::icon
                                    name="heroicon-m-check-circle"
                                    class="mr-1 h-4 w-4"
                                />
                                {{ __('Enabled') }}
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-800 dark:bg-gray-500/20 dark:text-gray-400">
                                <x-filament::icon
                                    name="heroicon-m-x-circle"
                                    class="mr-1 h-4 w-4"
                                />
                                {{ __('Not enabled') }}
                            </span>
                        @endif
                    </div>

                    <x-filament::button wire:click="manageTwoFactorAuthentication" type="button">
                        {{ $twoFactorEnabled ? __('Manage 2FA') : __('Enable 2FA') }}
                    </x-filament::button>
                </div>
            </x-filament::section>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4">
                <x-filament::button wire:click="cancel" color="gray" type="button" outlined>
                    {{ __('Cancel') }}
                </x-filament::button>

                <x-filament::button type="submit">
                    {{ __('Save Changes') }}
                </x-filament::button>
            </div>
        </form>
    </x-filament::section>
</x-filament::page>
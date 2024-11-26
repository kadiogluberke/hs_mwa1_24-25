<div>
    <x-input-label for="profile_picture" :value="__('Profile Picture')" class="mt-1 block w-full"/>
    <div>
        <input id="profile_picture" type="file" name="profile_picture" class="mt-2">
        @php $name='profile_picture'; @endphp
        <!-- include('components.form._form-error-handling'); -->
    </div>
</div>
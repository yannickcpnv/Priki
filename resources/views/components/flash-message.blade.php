<div>
    @if ($message = Session::get('basic'))
        <x-notification :message="$message" :type="'basic'"/>
    @endif

    @if ($message = Session::get('success'))
        <x-notification :message="$message" :type="'success'"/>
    @endif

    @if ($message = Session::get('error'))
        <x-notification :message="$message" :type="'error'"/>
    @endif

    @if ($message = Session::get('warning'))
        <x-notification :message="$message" :type="'warning'"/>
    @endif

    @if ($message = Session::get('info'))
        <x-notification :message="$message" :type="'info'"/>
    @endif

    @if ($errors->any())
        <x-notification :message="__('Flash default error message')" :type="'danger'"/>
    @endif
</div>

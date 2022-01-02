<div>
    @if ($message = Session::get('basic'))
        <div class="notification"
             x-data="{ showSuccess: true }"
             x-show="showSuccess"
             x-transition:leave="anim-leave"
             x-transition:leave-start="anim-leave-start"
             x-transition:leave-end="anim-leave-end"
        >
            <button class="delete"
                    @click="showSuccess = false"
            ></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="notification is-success"
             x-data="{ showSuccess: true }"
             x-show="showSuccess"
             x-transition:leave="anim-leave"
             x-transition:leave-start="anim-leave-start"
             x-transition:leave-end="anim-leave-end"
        >
            <button class="delete"
                    @click="showSuccess = false"
            ></button>
            {{ $message }}
        </div>
    @endif


    @if ($message = Session::get('error'))
        <div class="notification is-danger"
             x-data="{ showError: true }"
             x-show="showError"
             x-transition:leave="anim-leave"
             x-transition:leave-start="anim-leave-start"
             x-transition:leave-end="anim-leave-end"
        >
            <button class="delete"
                    @click="showError = false"
            ></button>
            {{ $message }}
        </div>
    @endif


    @if ($message = Session::get('warning'))
        <div class="notification is-warning"
             x-data="{ showWarning: true }"
             x-show="showWarning"
             x-transition:leave="anim-leave"
             x-transition:leave-start="anim-leave-start"
             x-transition:leave-end="anim-leave-end"
        >
            <button class="delete"
                    @click="showWarning = false"
            ></button>
            {{ $message }}
        </div>
    @endif


    @if ($message = Session::get('info'))
        <div class="notification is-info"
             x-data="{ showInfo: true }"
             x-show="showInfo"
             x-transition:leave="anim-leave"
             x-transition:leave-start="anim-leave-start"
             x-transition:leave-end="anim-leave-end"
        >
            <button class="delete"
                    @click="showInfo = false"
            ></button>
            {{ $message }}
        </div>
    @endif


    @if ($errors->any())
        <div class="notification is-danger"
             x-data="{ showDefault: true }"
             x-show="showDefault"
             x-transition:leave="anim-leave"
             x-transition:leave-start="anim-leave-start"
             x-transition:leave-end="anim-leave-end"
        >
            <button class="delete"
                    @click="showDefault = false"
            ></button>
            {{ __('Flash default error message') }}
        </div>
    @endif
</div>

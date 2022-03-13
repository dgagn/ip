@props(['type' => 'error'])

<closable-element delay="150"
                {{$attributes->merge(['class' => 'transition-opacity bg-' . $type . '-200 opacity-100 dark:bg-' . $type . '-200/30 p-sm flex justify-between rounded-md'])}} oncloseclass="!opacity-0">
    <div class="flex">
        @if($type === 'warning' || $type === 'error')
            <x-alert.exclamation class="fill-{{$type}}-500"></x-alert.exclamation>
        @elseif($type === 'success')
            <x-alert.checkmark class="fill-success-500"></x-alert.checkmark>
        @elseif($type === 'info')
            <x-alert.info class="fill-info-500"></x-alert.info>
        @endif
        <p class="text-sm">{{$slot}}</p>
    </div>

    <button class="mr-sm self-center">
        <svg class="fill-contrast-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <title>e-remove</title>
            <g>
                <path
                    d="M14.7,1.3c-0.4-0.4-1-0.4-1.4,0L8,6.6L2.7,1.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4L6.6,8l-5.3,5.3 c-0.4,0.4-0.4,1,0,1.4C1.5,14.9,1.7,15,2,15s0.5-0.1,0.7-0.3L8,9.4l5.3,5.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L9.4,8l5.3-5.3C15.1,2.3,15.1,1.7,14.7,1.3z"></path>
            </g>
        </svg>
    </button>
</closable-element>

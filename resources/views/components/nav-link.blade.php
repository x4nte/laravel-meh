@props(['active' => false])
<a {{$attributes}} class="hover:text-gray-200 transition-colors duration-200 {{$active ? 'text-white border-b border-gray-300 pb-1' : ''}}">{{$slot}}</a>

{{--

This Blade component generates a link that prefetches the page when the user hovers over it.

Attributes:
- $href: The URL the link points to.
- $key (optional): A unique key for the link, used by Livewire for DOM diffing.

Usage:
- Ensure Livewire is imported and configured in your project.
- Use this component to create links that improve user experience by prefetching content on hover.

Example:
<x-link href="/example-page" key="unique-key">Example Page</x-link>

Link to the documentation: https://livewire.laravel.com/docs/navigate#basic-usage

--}}

<a wire:navigate.hover href="{{$href}}" @isset($key) wire:key='{{$key}}' @endif>{{$slot}}</a>

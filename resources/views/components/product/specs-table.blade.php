@props(['specs' => []])

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl border border-gray-200']) }}>
    <table class="w-full text-sm sm:text-base">
        <tbody>
            @foreach ($specs as $spec)
                <tr class="{{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                    <td class="px-3 sm:px-4 py-2.5 sm:py-3 font-semibold text-gray-900 bg-gray-50 w-2/5 sm:w-1/3">{{ $spec['label'] }}</td>
                    <td class="px-3 sm:px-4 py-2.5 sm:py-3 text-gray-600">{{ $spec['value'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

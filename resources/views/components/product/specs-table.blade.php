@props(['specs' => []])

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl border border-border-gray']) }}>
    <table class="w-full text-sm">
        <tbody>
            @foreach ($specs as $spec)
                <tr class="{{ !$loop->last ? 'border-b border-border-gray' : '' }}">
                    <td class="px-4 py-3 font-medium text-dark-charcoal bg-light-gray/50 w-1/3">{{ $spec['label'] }}</td>
                    <td class="px-4 py-3 text-medium-gray">{{ $spec['value'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

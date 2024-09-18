@props(['rating'])

@for ($i = 1; $i <= 5; $i++)
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="w-6 h-6"
        fill="{{ $i <= $rating ? 'yellow' : 'gray' }}"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
        {{ $attributes }}
    >
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.248l2.828 5.722 6.32.921-4.58 4.464 1.08 6.3-5.648-2.966-5.648 2.966 1.08-6.3-4.58-4.464 6.32-.921L12 4.248z" />
    </svg>
@endfor

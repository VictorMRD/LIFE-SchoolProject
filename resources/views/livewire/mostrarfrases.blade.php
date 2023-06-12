<div class="text-white w-1/4 text-center">
    @if ($todaslasfrases && count($todaslasfrases) > 0)
        {{-- Success is as dangerous as failure. --}}
        <?php
            $maxIndex = count($todaslasfrases) - 1;
            $randomIndex = rand(0, $maxIndex);
            $randomFrase = $todaslasfrases[$randomIndex];
        ?>
        <p>{{ $randomFrase->frase }}</p>
    @endif
</div>


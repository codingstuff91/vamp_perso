<script setup>
defineProps({
    power : Object
})
</script>

<template>
    <div class="px-2 py-4 mx-2 my-2 flex justify-between bg-gray-800 border border-red-500">
        <p class="text-white">{{ power.name }}</p>
        <p class="text-red-500">{{ power.dice_pool }}</p>
        <p class="text-white">Lvl 1</p>
    </div>
</template>

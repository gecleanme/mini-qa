
<script setup>

import $swal from "sweetalert2";
import {usePage} from "@inertiajs/vue3";

    if (usePage().props.flash.success) {
        $swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Operation succeeded',
            showConfirmButton: false,
            timer: 1500
        })
    }

</script>

<style scoped>

</style>

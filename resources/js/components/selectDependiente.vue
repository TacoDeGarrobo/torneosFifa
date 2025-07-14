<template>
<div>
    <div>
        <label for="tipo" class="text-gray-700 dark:text-gray-300">Modelo de torneo</label>
        <select id="tipo" 
        v-model="selectedTipo" 
        @change="fetchmax_equipos" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">Selecciona el modelo de torneo</option>
            <option v-for="tipo in props.initialTiposTorneo" :key="tipo.id" :value="tipo.id">
                {{ tipo.name }}
            </option>
        </select>
    </div>
    <div>
        <label for="max_equipos" class="text-gray-700 dark:text-gray-300">Máximo de Equipos:</label>
        <select id="max_equipos" v-model="selectedMaxEquipos" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">Selecciona el máximo de equipos</option>
            <option v-for="max in max_equipos" :key="max.id" :value="max.id">
                {{ max.name }}
            </option>
        </select>
    </div>
</div>
</template>

<script>
import { ref } from 'vue';

export default {
    props: {
        initialTiposTorneo: {
            type: Array,
            default: () => [],
        },
    },
    setup(props) {

        const selectedTipo = ref('');
        const selectedMaxEquipos = ref('');
        const max_equipos = ref([]);
    
        const fetchmax_equipos = async () => {
            max_equipos.value = [];
            selectedMaxEquipos.value = '';

            if (selectedTipo.value) {
                try {
                    // Realiza la solicitud al servidor para obtener el máximo de equipos según el tipo seleccionado
                    // Asegúrate de que la URL sea correcta según tu configuración de rutas
                    const response = await fetch(`/getMaxEquipos?tipo_id=${selectedTipo.value}`);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const data = await response.json();
                    max_equipos.value = data;
                } catch (error) {
                    console.error('Error al cargar máximo de equipos:', error);
                    max_equipos.value = [];
                }
            }
        };

        return {
            selectedTipo,
            selectedMaxEquipos,
            max_equipos,
            fetchmax_equipos,
            props 
        };
    },
}
</script>
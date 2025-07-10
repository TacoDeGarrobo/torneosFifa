<template>
<div>
    <div>
        <label for="tipo" class="text-gray-700 dark:text-gray-300">Modelo de torneo</label>
        <select id="tipo" v-model="selectedTipo" @change="fetchmax_equipos" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">Selecciona el modelo de torneo</option>
            <option v-for="tipo in TiposTorneo" :key="tipo.id" :value="tipo.id">
                {{ tipo.name }}
            </option>
        </select>
    </div>
    <div v-if="selectedTipo">
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
import { ref, onMounted } from 'vue';
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
        //const TiposTorneo = ref([]);
        const max_equipos = ref([]);

        onMounted(() => {
            if (props.initialTiposTorneo.length > 0) {
                TiposTorneo.value = props.initialTiposTorneo.map(tipo => ({ id: tipo.id, name: tipo.name }));
            } else {
                // Simulación de datos si no se pasan por props
               // TiposTorneo.value = [
                 //   { id: 1, name: 'Liga' },
                   // { id: 2, name: 'Eliminatoria' },
                   // { id: 3, name: 'Liga y Eliminatoria' },
                   // { id: 4, name: 'UCL' }, // Puedes agregar más tipos según sea necesario
                //];
            }
        });

        const fetchmax_equipos = async () => {
            max_equipos.value = []; // Limpiar opciones al cambiar el tipo
            selectedMaxEquipos.value = ''; // Resetear selección

            if (selectedTipo.value) {
                try {
                    const response = await fetch(`/getMaxEquipos?tipo_id=${selectedTipo.value}`);
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
            TiposTorneo,
            max_equipos,
            fetchmax_equipos,
        };
    },
}
</script>
<script>
import axios from 'axios';
import {onMounted, ref} from 'vue';

export default {
    setup() {
        // reactive state
        let products_sales = ref([]);
        // mounted
        onMounted(() => {
            // get api from laravel backend
            axios
                .get('/product-sales')
                .then((res) => {
                    // assign state products_sales with response data
                    products_sales.value = res.data;
                })
                .catch((error) => {
                    console.log(error.res.data);
                });
        });

        return {
            products_sales
        };
    },
};
</script>

<template>
    <VRow>
        <!-- basic -->
        <VCol cols="12">
            <VCard title="Products Sales">
                <VTable>
                    <thead>
                    <tr>
                        <th className="text-uppercase">
                            Id
                        </th>
                        <th className="text-center text-uppercase">
                            quantity
                        </th>
                        <th className="text-center text-uppercase">
                            Total Amount
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="sale in products_sales">
                        <td>{{ sale.id }}</td>
                        <td className="text-center">{{ sale.quantity }}</td>
                        <td className="text-center">
                            {{ sale.total_amount }}
                        </td>
                    </tr>
                    </tbody>
                </VTable>

            </VCard>
        </VCol>
    </VRow>
</template>

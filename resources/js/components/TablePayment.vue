
<template>
    <table class="table table-bordered table-striped" id="payments-table">
        <thead>
            <tr>
                <th>№</th>
                <th>Логин</th>
                <th>Реквизиты</th>
                <th>Сумма</th>
                <th>Валюта</th>
                <th>Статус заявки</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="payment in payments">
                <td>{{ payment.id }}</td>
                <td>{{ payment.login }}</td>
                <td>{{ payment.requisites }}</td>
                <td>{{ payment.amount }}</td>
                <td>{{ payment.currency }}</td>
                <td>
                    <select class="form-select payments-status" @change="onChangeStatusPayment(payment.id, $event)">
                        <option
                            v-for="option in options" 
                            :value="option.value" 
                            :selected="option.value == payment.status"
                        >
                            {{ option.text }}
                        </option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data: function() {
            return {
                payments: [],
                options: [
                    { text: 'Не оплачен', value: 'Не оплачен' },
                    { text: 'Оплачен', value: 'Оплачен' },
                ],
            }
        },
        mounted() {
            var app = this;
            axios.get('api/get-payments').then(function(resp) {
                app.payments = resp.data;
            }).catch(function(resp) {
                alert("Could not load payments");
            });
        },
        updated() {
            this.$nextTick(function () {
                const dataTable = $('#payments-table').DataTable({});
            })
        },
        methods: {
            onChangeStatusPayment(id, event) {
                const data = { 
                    id: id,
                    status: event.target.value
                };

                axios.post("api/change-status-payment", data).then(function(resp) {
                    toastr.success(resp.data.message);
                }).catch(function(resp) {
                    alert("Error");
                });
            }
        }
    }
</script>
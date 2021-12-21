<template>
    <card class="h-auto max-w-xs">
        <div class="px-3 py-3">
            <div class="mt-2" id="app">
                <table align="center" class="table">
                    <tr>
                        <th class="tableHeader">City</th>
                        <th class="tableHeader">Time</th>
                    </tr>
                    <tr v-for="(tzInfo, tzRawName) in this.times">
                        <td class="timezoneRow">
                            <div>{{tzInfo.name}}</div>
                            <div v-if="card.timezoneDescriptions.hasOwnProperty(tzRawName)" class="text-xs text-grey">
                                {{card.timezoneDescriptions[tzRawName]}}
                            </div>
                        </td>
                        <td class="timezoneRow">
                            <time>{{tzInfo.time}}</time>
                            <span v-if="tzInfo.night" class="night">🌙</span>
                            <span v-if="!tzInfo.night" class="day">☀️</span>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </card>
</template>

<style scoped>
    .day {
        color: transparent;
        text-shadow: 0 0 0 #f4b21f;
    }

    .night {
        color: transparent;
        text-shadow: 0 0 0 #020202;
    }

    .timezoneRow {
        height: 35px !important;
    }

    .tableHeader {
        background-color: transparent !important;
    }
</style>

<script>
    export default {
        props: ['card'],
        data() {
            return {
                times: [],
            }
        },
        created: function () {
            this.getTime();
            setInterval(this.getTime, this.card.ms)
        },
        mounted() {
            this.getTime();
        },
        methods: {
            getTime() {
                Nova.request()
                    .post(this.card.refreshRoute, {
                        timezones: this.card.timezones,
                        timeFormat: this.card.timeFormat,
                        nightHours: this.card.nightHours,
                        hideContinents: this.card.hideContinents,
                    })
                    .then(res => {
                        this.times = res.data;
                    });
            },
        },
    }
</script>

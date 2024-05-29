<template>
    <Card class="h-auto max-w-md">
        <div class="px-3 py-3">
            <div class="mt-2" id="app">
                <table align="center" class="w-full">
                    <tr class="timezoneRow">
                        <th class="uppercase tracking-wide font-bold text-xs">City</th>
                        <th class="uppercase tracking-wide font-bold text-xs">Time</th>
                    </tr>
                    <tr v-for="(tzInfo, tzRawName) in this.times">
                        <td>
                            <div><b>{{tzInfo.name}}</b></div>
                            <div v-if="card.timezoneDescriptions.hasOwnProperty(tzRawName)" class="text-xs text-grey mb-2">
                                {{card.timezoneDescriptions[tzRawName]}}
                            </div>
                        </td>
                        <td style="white-space: nowrap;">
                            <time>{{tzInfo.time}}</time>
                            <span v-if="tzInfo.night" class="night ml-1">🌙</span>
                            <span v-if="!tzInfo.night" class="day ml-1">☀️</span>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </Card>
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
</style>

<script>
    export default {
        props: ['card'],
        data() {
            return {
                times: [],
                interval: null,
            }
        },
        mounted() {
            this.fetch();
            if (this.card.ms) {
                this.interval = setInterval(this.fetch, this.card.ms);
            }

            // Listener for tab change
            document.addEventListener('visibilitychange', this.handleTabChange);
        },
        beforeUnmount() {
            if (this.interval) {
                clearInterval(this.interval);
            }

            // Remove listener
            document.removeEventListener('visibilitychange', this.handleTabChange);
        },
        methods: {
            fetch() {
                Nova.request()
                    .post(this.card.refreshRoute, {
                        timezones: this.card.timezones,
                        timeFormat: this.card.timeFormat,
                        nightHours: this.card.nightHours,
                        hideContinents: this.card.hideContinents,
                    })
                    .then(response => {
                        this.times = response.data;
                    });
            },
            handleTabChange() {
                if (document.hidden) {
                    if (this.interval) {
                        clearInterval(this.interval);
                        this.interval = null;
                    }
                } else {
                    if (!this.interval && this.card.ms) {
                        this.interval = setInterval(this.fetch, this.card.ms);
                    }
                }
            },
        },
    }
</script>

<template>
    <div class="d-flex justify-content-center">
        <div class="time-box">{{ days }}</div>
        <span class="seperator">:</span>
        <div class="time-box">{{ hours }}</div>
        <span class="seperator">:</span>
        <div class="time-box">{{ minutes }}</div>
        <span class="seperator">:</span>
        <div class="time-box">{{ seconds }}</div>
    </div>
</template>

<script>
    export default {
        props: ['end'],
        data() {
            return {
                start: '',
                days: '',
                hours: '',
                minutes: '',
                seconds: '',

                calcdays: '',
            }
        },

        mounted() {
            this.countdown();
            this.timer = setInterval(() => this.countdown(), 1000);
        },

        methods: {
            countdown: function () {
                this.start = new Date().getTime();
                this.end = new Date(this.end).getTime();
                var dist = this.end - this.start;
                if (dist <= 0) {
                    this.days = '00';
                    this.hours = '00';
                    this.minutes = '00';
                    this.seconds = '00';
                } else {
                    this.days = this.format(Math.floor(dist / (1000 * 60 * 60 * 24)));
                    this.hours = this.format(Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                    this.minutes = this.format(Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60)));
                    this.seconds = this.format(Math.floor((dist % (1000 * 60)) / 1000));
                }


            },

            format: function (value) {
                if (value < 10) {
                    var formatedValue = '0' + value;
                    return formatedValue;
                } else {
                    return value;
                }
            }
        },
    }

</script>

<style>

</style>

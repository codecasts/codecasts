<script>
    import VueTypeahead from 'vue-typeahead'

    export default {
        extends: VueTypeahead, // vue@1.0.22+
        // mixins: [VueTypeahead], // vue@1.0.21-

        data () {
            return {
                data: {},
                limit: 5,
                minChars: 3,
                queryParamName: 'term'
            }
        },

        methods: {
            go(lesson) {
                window.location = `${this.baseUrl}/lesson/${lesson.slug}`;
            },
            onHit (item) {
                // alert(item)
            },
            prepareResponseData (data) {
                try {
                    return JSON.parse(data);
                } catch (e) {
                    return data;
                }
            },
            fetch () {
                if (!this.$http) {
                    return util.warn('You need to install the `vue-resource` plugin', this)
                }

                if (!this.src) {
                    return util.warn('You need to set the `src` property', this)
                }

                if (this.src.substr(-1) !== '/') {
                    this.src += '/'
                }

                const src = this.queryParamName
                        ? this.src
                        : this.src + this.query

                const params = this.queryParamName
                        ? Object.assign({ [this.queryParamName]: this.query }, this.data)
                        : this.data

                return this.$http.get(src, {params})
            },
        },
        props: {
            src: {
                require: true,
            },
            baseUrl: {
                require: true,
            }
        }
    }
</script>

<template>
    <div class="cp-root">
        <!-- optional indicators -->
        <i class="fa fa-spinner fa-spin" v-if="loading"></i>
        <template v-else>
            <i class="fa fa-search" v-show="isEmpty"></i>
            <i class="fa fa-times" v-show="isDirty" @click="reset"></i>
        </template>

        <!-- the input field -->
        <input type="text"
               placeholder="Localizar vídeo"
               class="form-controll"
               autocomplete="off"
               v-model="query"
               @keydown.down="down"
               @keydown.up="up"
               @keydown.enter="hit"
               @keydown.esc="reset"
               blur="reset"
               @input="update"/>

        <!-- the list -->
        <ul v-show="hasItems">
            <li v-for="lesson in items"
                :class="activeClass($index)"
                @mousedown="hit"
                @mousemove="setActive($index)"
                @click="go(lesson)">
                <span>{{ lesson.title }}</span>
                <small v-if="lesson.track_title">[{{ lesson.track_title }}]</small>
                <small>{{ lesson.description }}</small>
            </li>
        </ul>
    </div>
</template>

<style scoped>
    .cp-root {
        position: relative;
    }
    input {
        width: 100%;
        font-size: 14px;
        color: #2c3e50;
        line-height: 1;
        box-shadow: inset 0 1px 4px rgba(0,0,0,.4);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        letter-spacing: 1px;
        box-sizing: border-box;
    }
    input:focus {
        border-color: #2C3E50;
        outline: 0;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #2C3E50;
    }
    .fa-times {
        cursor: pointer;
    }
    i {
        float: right;
        position: relative;
        top: 27px;
        right: 20px;
        opacity: 0.4;
    }
    ul {
        position: absolute;
        left: 0;
        width: 100%;
        padding: 0;
        margin-top: 8px;
        min-width: 100%;
        background-color: #fff;
        list-style: none;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0,0,0, 0.25);
        z-index: 1000;
    }
    li {
        padding: 10px 16px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
    }
    li small {
        display: block;
        width: auto;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    li:first-child {
        border-radius: 4px 4px 0 0;
    }
    li:last-child {
        border-radius: 0 0 4px 4px;
        border-bottom: 0;
    }
    span {
        display: block;
        color: #2c3e50;
    }
    .active {
        background-color: #2c3e50;
        color: #e6e6e6;
    }
    .active span {
        color: white;
    }
    .name {
        font-weight: 700;
        font-size: 18px;
    }
    .screen-name {
        font-style: italic;
    }
</style>


import {SnotifyPosition, SnotifyStyle} from 'vue-snotify';
export default{
    methods:{
        filter_array(test_array) {
            var index = -1,
            arr_length = test_array ? test_array.length : 0,
            resIndex = -1,
            result = [];
            while (++index < arr_length) {
            var value = test_array[index];
            if (value) {
                result[++resIndex] = value;
            }
            }
            return result;
            },
            error(text , continut){
                this.$snotify.create({
                    title: text,
                    body: continut,
                    config: {
                            position: SnotifyPosition.rightTop,
                            type : SnotifyStyle.error,
                    }
                })
            },
              success(text , continut){
                this.$snotify.create({
                    title: text,
                    body: continut,
                    config: {
                            position: SnotifyPosition.rightTop,
                            type : SnotifyStyle.success,
                    }
                })
            },
    }
}
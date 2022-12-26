export default {
    methods: {
        formatCurrency(value) {
            value = parseFloat(value);
            // if (typeof value !== "number") {
            //     return value + '@';
            // }

            let result = Math.abs(value);
            result = result.toString();
            result.replace(/\./,',');
            if (value > 0) result = '+ ' + result;
            if (value < 0) result = '- ' + result;
            result += '₽';

            return result;
        }
    }
}
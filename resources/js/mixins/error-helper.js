export default {
  methods: {
    getErrorMessage(errors, key) {
      let messages = _.get(errors, key);
      return _.isArray(messages) ? messages.join('. ') : messages;
    },

    hasError(errors, key) {
      return _.hasIn(errors, key);
    }
  }
};
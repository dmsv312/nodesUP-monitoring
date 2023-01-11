<template>
  <tr class="contract_details__item" :class="transactionClass">
    <td class="date">
      <div class="cell">{{ formattedTransactionDate }}</div>
    </td>
    <td class="description">
      <div class="cell">{{ description }}</div>
    </td>
    <td class="amount">
      <div class="cell">{{ formattedTransactionCurrency }}</div>
    </td>
  </tr>
</template>

<script>
import formatDateMixin from "@/mixins/formatDateMixin";
import formatCurrency from "@/mixins/formatCurrency";

export default {
  name: "transaction-row",
  props: {
    type: String,
    datetime: String,
    amount: String,
    description: String,
  },
  mixins: [
      formatDateMixin,
      formatCurrency
  ],
  computed: {
    transactionClass() {
      return this.type;
    },
    formattedTransactionDate() {
      return this.formatDate(this.datetime);
    },
    formattedTransactionCurrency() {
      return this.formatCurrency(this.amount);
    }
  }
}
</script>

<style lang="scss" scoped>
tr.contract_details__item {
  box-shadow: 0 6px 58px rgba(196, 203, 214, 0.103611);
  background: transparent;

  td {
    background: transparent;
    border-top: none !important;
    border-bottom: 12px solid #F7F8FC !important;
    padding: 0;

    .cell {
      background: #FFFFFF;
      min-height: 71px;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      overflow: hidden;
      padding: 5px 10px 5px 0;
    }

    &.date {
      .cell {
        position: relative;
        border-top-left-radius: 17px;
        border-bottom-left-radius: 17px;
        font-weight: 700;
        font-size: 16px;
        line-height: 24px;
        color: #2F2D35;
        padding-left: 60px;
        &:before {
          display: block;
          content: '';
          width: 14px;
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          background-color: transparent;
        }
      }
    }

    &.description {
      .cell {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
        color: #7D8592;
      }
    }

    &.amount {
      .cell {
        border-top-right-radius: 17px;
        border-bottom-right-radius: 17px;
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 24px;
        color: #2F2D35;
        white-space: nowrap;
        padding-right: 20px;
      }
    }
  }

  &.addition td.date .cell:before {
    background-color: #337AB7 !important;
  }
  &.decrease td.date .cell:before {
    background-color: #EB5757 !important;
  }
}
</style>
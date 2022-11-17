<template>
  <header-content></header-content>
  <div class="content">
    <div class="breadcrumbs">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item :to="{ path: '/' }">Главная</el-breadcrumb-item>
        <el-breadcrumb-item>Детализация</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <h1>Детализация</h1>
    <div class="columns">
      <div class="content">
        <p>
          Внимание! 1-го числа каждого месяца производится закрытие предыдущего расчетного периода и формирование
          счетов на оплату услуг. Итоговые начисления и оплаты могут быть скорректированы.
        </p>
        <div class="contract_details">
          <el-table
              :data="tableData"
              style="width: 100%"
              :row-class-name="tableRowClassName"
          >
            <el-table-column prop="date" class-name="date" label-class-name="date" label="Дата" />
            <el-table-column prop="description" class-name="description" label-class-name="description" label="Назначение платежа" />
            <el-table-column prop="amount" class-name="amount" label-class-name="amount" label="Сумма">
              <template #default="scope">
                {{ scope.row.amount > 0 ? '+ ' + scope.row.amount : '- ' + (scope.row.amount * -1) }}₽
              </template>
            </el-table-column>
          </el-table>
        </div>
        <div class="load-more-button">
          <el-button type="primary">Загрузить еще</el-button>
        </div>
      </div>
      <div class="sidebar">
        <div class="widget">
          <h3>Выгрузить отчёт</h3>
          <p>Укажите период, за который Вам нужна детализация</p>
          <div>
            <el-calendar ref="calendar" >
              <template #header="{ date }">
                <el-button-group class="w-100 calendar-controls">
                  <el-button type="default" class="prev" size="small" @click="selectDate('prev-month')">Prev</el-button>
                  <el-button type="default" class="date" size="small" @click="selectDate('today')">{{ date }}</el-button>
                  <el-button type="default" class="next" size="small" @click="selectDate('next-month')">Next</el-button>
                </el-button-group>
              </template>
            </el-calendar>
          </div>
          <div class="buttons">
            <el-button type="primary">Составить отчёт</el-button>
            <el-button type="default">Сохранить отчёт</el-button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer-content></footer-content>
</template>

<script>
import HeaderContent from "@/components/header/HeaderContent";
import FooterContent from "@/components/footer/FooterContent";

export default {
  name: "Details",
  components: {FooterContent, HeaderContent}
}
</script>

<script setup>
import { ref } from 'vue'

const calendar = ref()
const selectDate = (val) => {
  calendar.value.selectDate(val)
}

const tableRowClassName = ({row, rowIndex}) => {
  return row.amount < 0 ? 'decrease' : 'addition';
}

const tableData = [
  {
    date: '01.04.2021',
    description: 'Услуга из D+: трафик (- 236₽)',
    amount: -236,
  },
  {
    date: '26.03.2021',
    description: 'Услуга из D+: трафик (100₽)',
    amount: 100,
  },
  {
    date: '15.03.2021',
    description: 'Услуга из D+: трафик (400₽)',
    amount: 400,
  },
  {
    date: '01.03.2021',
    description: 'Услуга из D+: трафик (- 236₽)',
    amount: -236,
  },
]
</script>

<style lang="scss">
@import 'details-table.scss';
</style>
<style lang="scss" scoped>
@import 'details.scss';
</style>
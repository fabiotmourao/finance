<template>
<div>
    <!-- Título da página -->
    <h1 class="text-2xl font-semibold mb-12 mt-12 flex justify-center ">Gráficos Gerais</h1>
  <div class="min-w-full flex flex-col md:flex-row mt-7">
        <!-- Componente do gráfico de pizza -->
        <div class="w-full md:w-1/2 mb-4 px-4">
            <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                    Gráfico de pizza
                </h6>
                <div>
                    <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                    Visualize seus dados de forma simples.
                    </p>
                </div>
                </div>
                <div class="py-6 mt-4 grid place-items-center px-2">
                <div ref="pieChart"></div>
                </div>
            </div>
        </div>

        <!-- Componente do gráfico de linha -->
        <div class="w-full md:w-1/2 mb-4 px-4">
            <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                    Gráfico de linha
                </h6>
                <div>
                    <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                    Visualize seus dados de forma simples.
                    </p>
                </div>
                </div>
                <div class="pt-6 px-2 pb-0">
                <div ref="lineChart"></div>
                </div>
            </div>
        </div>

  </div>
</div>

</template>

<script>
import ApexCharts from 'apexcharts';

export default {
  mounted() {
    // Configurações do gráfico de pizza
    const pieChartConfig = {
      series: [44, 55, 13, 43, 22],
      chart: {
        type: "pie",
        width: 280,
        height: 280,
        toolbar: {
          show: false,
        },
      },
      title: {
        show: "",
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#020617", "#ff8f00", "#00897b", "#1e88e5", "#d81b60"],
      legend: {
        show: false,
      },
    };

    // Configurações do gráfico de linha
    const lineChartConfig = {
      series: [
        {
          name: "Sales",
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500, 158, 298, 986],
        },
      ],
      chart: {
        type: "bar",
        height: 240,
        toolbar: {
          show: false,
        },
      },
      title: {
        show: "",
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#020617"],
      plotOptions: {
        bar: {
          columnWidth: "40%",
          borderRadius: 2,
        },
      },
      xaxis: {
        axisTicks: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
        labels: {
          style: {
            colors: "#616161",
            fontSize: "12px",
            fontFamily: "inherit",
            fontWeight: 400,
          },
        },
        categories: [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro",
        ],
      },
      yaxis: {
        labels: {
          style: {
            colors: "#616161",
            fontSize: "12px",
            fontFamily: "inherit",
            fontWeight: 400,
          },
        },
      },
      grid: {
        show: true,
        borderColor: "#dddddd",
        strokeDashArray: 5,
        xaxis: {
          lines: {
            show: true,
          },
        },
        padding: {
          top: 5,
          right: 20,
        },
      },
      fill: {
        opacity: 0.8,
      },
      tooltip: {
        theme: "dark",
      },
    };

    // Renderiza o gráfico de pizza
    const pieChart = new ApexCharts(this.$refs.pieChart, pieChartConfig);
    pieChart.render();

    // Renderiza o gráfico de linha
    const lineChart = new ApexCharts(this.$refs.lineChart, lineChartConfig);
    lineChart.render();
  },
};
</script>

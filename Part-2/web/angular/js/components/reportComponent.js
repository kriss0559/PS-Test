(() => {
  'use strict';

  const report = angular.module('report');

  report.component('reportBar', {
    bindings: {
      brand: '<'
    },
    // Pulls in out template
    templateUrl: './angular/js/components/reportComponent.html',
    controller: function ($http,$scope) {
      this.product = '';
      this.reportData = [];

      this.productsData = [];
      this.totalProducts = 0;
      $scope.clients=[];
      $scope.products=[];
      $scope.relativeDates=[
        {label: 'Last Month to Date',value:'LASTMONTHTODATE'},
        {label: 'This Month',value:'THISMONTH'},
        {label: 'This Year',value:'THISYEAR'},
        {label: 'Last Year',value:'LASTYEAR'}
      ];

      $scope.filterClient={
          client: ''
      }     
      $scope.filterProduct={
          product: ''
      }
      $scope.filterDate={
        rDate: ''
    }

      this.reportDataHeader = [
        {label: 'Invoice Number'},
        {label: 'Invoice Date'},
        {label: 'Description'},
        {label: 'Qty'},
        {label: 'Price'},
        {label: 'Total'}
      ];
      
      // Loads all records on the page and also populate client filter dropdown on the top
      this.loadReport = function(){
        $http({
          method: 'GET',
          params: {},
          url: getClientListRoute+"/filter"
        }).then(function successCallback(response) {
          this.reportData=response.data.products; 
          this.totalProducts = this.reportData.length;
          $scope.clients=response.data.clients;          
          }.bind(this));
      }
       // when someone selects client from client filter dropdown loadProducts calls and 
       // it populates products related to specific client in the product filter dropdown.
      this.loadProducts= function(){
        $http({
          method: 'GET',
          params: {client_id:$scope.filterClient.client},
          url: getClientListRoute+"/products"
        }).then(function successCallback(response) {
          $scope.products=response.data.product_options;
          }.bind(this));
      }
      // When someone clicks on generate report button generateReport functions displays records based on filter apply.
      this.generateReport = function(){
        $http({
          method: 'GET',
          params: {client_id:$scope.filterClient.client,product_id:$scope.filterProduct.product,relative_dates:$scope.filterDate.rDate},
          url: getClientListRoute+"/generate-report"
        }).then(function successCallback(response) {
            this.reportData=response.data.products;
            this.totalProducts = this.reportData.length;
          }.bind(this));
      }
      this.loadReport();
    }
  });
})();

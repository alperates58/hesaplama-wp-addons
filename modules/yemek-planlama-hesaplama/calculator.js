function hcMealPlannerHesapla() {
    const people = parseFloat(document.getElementById('hc-mp-people').value);
    const days = parseFloat(document.getElementById('hc-mp-days').value);
    const meals = parseFloat(document.getElementById('hc-mp-meals').value);

    if (isNaN(people) || isNaN(days) || isNaN(meals) || people <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const totalMeals = people * days * meals;

    document.getElementById('hc-mp-val').innerText = totalMeals + ' Toplam Porsiyon';
    document.getElementById('hc-mp-info').innerText = `Haftalık ${totalMeals} porsiyon yemek planlamanız gerekmektedir. Porsiyon başı ortalama 300-400g ana malzeme hesabı yapabilirsiniz.`;
    
    document.getElementById('hc-meal-planner-result').classList.add('visible');
}

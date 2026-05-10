function hcPlastikKullanımıAzaltmaHesapla() {
    const items = document.querySelectorAll('.hc-pr-item:checked');
    let weeklyCount = 0;

    items.forEach(i => weeklyCount += parseFloat(i.value));

    if (weeklyCount === 0) return;

    const yearlyCount = weeklyCount * 52;
    // Ortalama 10g per plastic item
    const yearlyWeight = (yearlyCount * 10) / 1000;

    document.getElementById('hc-pr-val').innerText = yearlyWeight.toFixed(1) + ' kg Plastik';
    document.getElementById('hc-pr-info').innerText = `Yılda tam ${Math.round(yearlyCount)} adet plastik parçanın doğaya karışmasını engellediniz!`;
    document.getElementById('hc-pr-result').classList.add('visible');
}

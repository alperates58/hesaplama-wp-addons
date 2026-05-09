function hcROSHesapla() {
    const netProfit = parseFloat(document.getElementById('hc-ros-net-profit').value) || 0;
    const revenue = parseFloat(document.getElementById('hc-ros-revenue').value) || 0;

    if (revenue === 0) {
        alert('Satış tutarı sıfır olamaz.');
        return;
    }

    const ros = (netProfit / revenue) * 100;

    document.getElementById('hc-ros-res-val').innerText = '%' + ros.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-ros-result').classList.add('visible');
}

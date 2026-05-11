function hcLineBalancingHesapla() {
    const time = parseFloat(document.getElementById('hc-lb-time').value);
    const demand = parseFloat(document.getElementById('hc-lb-demand').value);
    const taskSum = parseFloat(document.getElementById('hc-lb-task-sum').value);

    if (isNaN(time) || isNaN(demand) || isNaN(taskSum) || demand <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Cycle Time C = Total Production Time / Demand
    const cycleTime = time / demand;

    // Number of Stations N = Sum of Task Times / Cycle Time
    const stations = taskSum / cycleTime;
    const nActual = Math.ceil(stations);

    // Efficiency = Sum of Task Times / (N_actual * Cycle Time)
    const efficiency = (taskSum / (nActual * cycleTime)) * 100;

    document.getElementById('hc-lb-res-cycle').innerText = cycleTime.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dk/adet';
    document.getElementById('hc-lb-res-stations').innerText = nActual.toLocaleString('tr-TR');
    document.getElementById('hc-lb-res-eff').innerText = '%' + efficiency.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-lb-result').classList.add('visible');
}

function hcLineEffHesapla() {
    const qty = parseFloat(document.getElementById('hc-le-qty').value);
    const std = parseFloat(document.getElementById('hc-le-std').value);
    const time = parseFloat(document.getElementById('hc-le-time').value);
    const workers = parseFloat(document.getElementById('hc-le-workers').value);

    if (isNaN(qty) || isNaN(std) || isNaN(time) || isNaN(workers) || time <= 0 || workers <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Efficiency = (Produced Qty * Std Time) / (Actual Time * Num Workers)
    const totalStdMinutes = qty * std;
    const totalActualMinutes = time * workers;
    const efficiency = (totalStdMinutes / totalActualMinutes) * 100;

    document.getElementById('hc-le-res-val').innerText = '%' + efficiency.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-le-result').classList.add('visible');
}

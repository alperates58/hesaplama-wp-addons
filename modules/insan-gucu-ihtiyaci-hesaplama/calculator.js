function hcManpowerHesapla() {
    const qty = parseFloat(document.getElementById('hc-mp-qty').value);
    const std = parseFloat(document.getElementById('hc-mp-std').value);
    const time = parseFloat(document.getElementById('hc-mp-time').value);
    const eff = parseFloat(document.getElementById('hc-mp-eff').value) / 100;

    if (isNaN(qty) || isNaN(std) || isNaN(time) || isNaN(eff) || time <= 0 || eff <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Needed = (Total workload) / (Capacity per worker)
    // Workload = Qty * Std
    // Capacity = Time * Efficiency
    const workload = qty * std;
    const capacity = time * eff;
    const workers = workload / capacity;

    document.getElementById('hc-mp-res-val').innerText = Math.ceil(workers).toLocaleString('tr-TR') + ' Kişi';
    
    document.getElementById('hc-mp-result').classList.add('visible');
}

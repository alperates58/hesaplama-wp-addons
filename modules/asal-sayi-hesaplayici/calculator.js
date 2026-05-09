function isPrime(num) {
    if (num <= 1) return false;
    if (num <= 3) return true;
    if (num % 2 === 0 || num % 3 === 0) return false;
    for (let i = 5; i * i <= num; i = i + 6) {
        if (num % i === 0 || num % (i + 2) === 0) return false;
    }
    return true;
}

function hcSwitchAsalTab(btn, mode) {
    document.querySelectorAll('.hc-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.getElementById('hc-asal-check-panel').style.display = mode === 'check' ? 'block' : 'none';
    document.getElementById('hc-asal-range-panel').style.display = mode === 'range' ? 'block' : 'none';
    document.getElementById('hc-asal-result').classList.remove('visible');
}

function hcAsalKontrol() {
    const n = parseInt(document.getElementById('hc-asal-val').value);
    if (isNaN(n)) { alert('Lütfen bir sayı giriniz.'); return; }

    const res = isPrime(n);
    const mainDiv = document.getElementById('hc-asal-res-main');
    const listDiv = document.getElementById('hc-asal-res-list');

    mainDiv.innerHTML = `<div class="hc-res-card ${res ? 'success' : 'error'}">
        <h4>${n} sayısı</h4>
        <div class="hc-res-status">${res ? 'ASALDIR' : 'ASAL DEĞİLDİR'}</div>
    </div>`;
    listDiv.innerHTML = '';

    document.getElementById('hc-asal-result').classList.add('visible');
}

function hcAsalListe() {
    const start = parseInt(document.getElementById('hc-asal-start').value);
    const end = parseInt(document.getElementById('hc-asal-end').value);

    if (isNaN(start) || isNaN(end) || end < start) {
        alert('Lütfen geçerli bir aralık giriniz.');
        return;
    }

    if (end - start > 10000) {
        alert('Lütfen en fazla 10.000 sayılık bir aralık seçin.');
        return;
    }

    let primes = [];
    for (let i = Math.max(2, start); i <= end; i++) {
        if (isPrime(i)) primes.push(i);
    }

    const mainDiv = document.getElementById('hc-asal-res-main');
    const listDiv = document.getElementById('hc-asal-res-list');

    mainDiv.innerHTML = `<div class="hc-res-card info">
        <h4>Aralıktaki Asallar</h4>
        <div class="hc-res-status">${primes.length} adet bulundu</div>
    </div>`;
    
    listDiv.innerHTML = primes.map(p => `<span>${p}</span>`).join('');

    document.getElementById('hc-asal-result').classList.add('visible');
}

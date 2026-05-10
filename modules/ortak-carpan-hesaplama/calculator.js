function hcCommonFactorsHesapla() {
    const input = document.getElementById('hc-cf-input').value;
    const nums = input.split(',').map(n => parseInt(n.trim())).filter(n => !isNaN(n) && n > 0);

    if (nums.length < 2) {
        alert('Lütfen en az iki pozitif sayı giriniz.');
        return;
    }

    function gcd(a, b) {
        return b ? gcd(b, a % b) : a;
    }

    let commonGcd = nums[0];
    for (let i = 1; i < nums.length; i++) {
        commonGcd = gcd(commonGcd, nums[i]);
    }

    let factors = [];
    for (let i = 1; i <= commonGcd; i++) {
        if (commonGcd % i === 0) {
            factors.push(i);
        }
    }

    document.getElementById('hc-cf-res-val').innerText = factors.join(', ');
    document.getElementById('hc-cf-ebob').innerText = `EBOB: ${commonGcd}`;
    document.getElementById('hc-common-factors-result').classList.add('visible');
}

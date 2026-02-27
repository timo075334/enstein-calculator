<x-app-layout>
    <style>
        .calc-wrap {
            max-width: 390px;
            margin: 0 auto;
            padding: 16px;
        }
        .calculator {
            background: #1f2937;
            border: 1px solid #374151;
            border-radius: 24px;
            padding: 14px;
            box-shadow: 0 20px 30px rgba(0,0,0,.35);
        }
        .display-box {
            background: #000;
            border-radius: 16px;
            padding: 12px;
            text-align: right;
            margin-bottom: 12px;
        }
        #calc-expression {
            min-height: 16px;
            color: #9ca3af;
            font-size: 12px;
        }
        #calc-display {
            margin-top: 4px;
            color: #fff;
            font-size: 42px;
            font-weight: 700;
            line-height: 1.1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .keys {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }
        .key {
            height: 58px;
            border: 0;
            border-radius: 16px;
            font-size: 26px;
            cursor: pointer;
            transition: transform .08s ease, filter .15s ease;
        }
        .key:active { transform: scale(0.97); }

        .fn { background: #9ca3af; color: #000; font-size: 20px; font-weight: 700; }
        .num { background: #374151; color: #fff; font-weight: 500; }
        .op  { background: #f59e0b; color: #fff; font-weight: 700; }
        .eq  { background: #f59e0b; color: #fff; font-weight: 700; }
        .zero { grid-column: span 2; }

        .key:hover { filter: brightness(1.08); }
    </style>

    <div class="py-6">
        <div class="calc-wrap">
            <div class="calculator">
                <div class="display-box">
                    <div id="calc-expression"></div>
                    <div id="calc-display">0</div>
                </div>

                <div class="keys">
                    <button data-action="clear" class="key fn">AC</button>
                    <button data-action="delete" class="key fn">DEL</button>
                    <button data-action="operator" data-value="%" class="key fn">%</button>
                    <button data-action="operator" data-value="/" class="key op">÷</button>

                    <button data-action="digit" data-value="7" class="key num">7</button>
                    <button data-action="digit" data-value="8" class="key num">8</button>
                    <button data-action="digit" data-value="9" class="key num">9</button>
                    <button data-action="operator" data-value="*" class="key op">×</button>

                    <button data-action="digit" data-value="4" class="key num">4</button>
                    <button data-action="digit" data-value="5" class="key num">5</button>
                    <button data-action="digit" data-value="6" class="key num">6</button>
                    <button data-action="operator" data-value="-" class="key op">−</button>

                    <button data-action="digit" data-value="1" class="key num">1</button>
                    <button data-action="digit" data-value="2" class="key num">2</button>
                    <button data-action="digit" data-value="3" class="key num">3</button>
                    <button data-action="operator" data-value="+" class="key op">+</button>

                    <button data-action="digit" data-value="0" class="key num zero">0</button>
                    <button data-action="decimal" class="key num">.</button>
                    <button data-action="equals" class="key eq">=</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const display = document.getElementById('calc-display');
        const expression = document.getElementById('calc-expression');
        const keys = document.querySelectorAll('[data-action]');

        let current = '0';
        let previous = null;
        let operator = null;
        let resetCurrent = false;

        function formatNumber(value) {
            if (!Number.isFinite(value)) {
                return 'Error';
            }

            return Number(value.toFixed(10)).toString();
        }

        function render() {
            display.textContent = current;
            expression.textContent = operator && previous !== null ? `${previous} ${operator}` : '';
        }

        function compute(a, op, b) {
            if (op === '+') return a + b;
            if (op === '-') return a - b;
            if (op === '*') return a * b;
            if (op === '/') return b === 0 ? NaN : a / b;
            if (op === '%') return a % b;
            return b;
        }

        function setDigit(digit) {
            if (resetCurrent) {
                current = digit;
                resetCurrent = false;
            } else {
                current = current === '0' ? digit : current + digit;
            }
            render();
        }

        function setDecimal() {
            if (resetCurrent) {
                current = '0.';
                resetCurrent = false;
            } else if (!current.includes('.')) {
                current += '.';
            }
            render();
        }

        function setOperator(nextOperator) {
            const currentValue = Number(current);

            if (previous === null || resetCurrent) {
                previous = currentValue;
            } else if (operator) {
                const calculated = compute(previous, operator, currentValue);
                if (!Number.isFinite(calculated)) {
                    current = 'Error';
                    previous = null;
                    operator = null;
                    resetCurrent = true;
                    render();
                    return;
                }
                previous = calculated;
                current = formatNumber(calculated);
            }

            operator = nextOperator;
            resetCurrent = true;
            render();
        }

        function setEquals() {
            if (operator === null || previous === null) {
                return;
            }

            const calculated = compute(previous, operator, Number(current));
            if (!Number.isFinite(calculated)) {
                current = 'Error';
            } else {
                current = formatNumber(calculated);
            }

            previous = null;
            operator = null;
            resetCurrent = true;
            render();
        }

        function clearAll() {
            current = '0';
            previous = null;
            operator = null;
            resetCurrent = false;
            render();
        }

        function deleteLast() {
            if (resetCurrent || current === 'Error') {
                current = '0';
                resetCurrent = false;
                render();
                return;
            }

            current = current.length > 1 ? current.slice(0, -1) : '0';
            render();
        }

        keys.forEach((key) => {
            key.addEventListener('click', () => {
                const action = key.dataset.action;
                const value = key.dataset.value;

                if (action === 'digit') setDigit(value);
                if (action === 'decimal') setDecimal();
                if (action === 'operator') setOperator(value);
                if (action === 'equals') setEquals();
                if (action === 'clear') clearAll();
                if (action === 'delete') deleteLast();
            });
        });

        render();
    </script>
</x-app-layout>

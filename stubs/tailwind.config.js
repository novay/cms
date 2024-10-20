/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    darkMode: 'class',
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./vendor/novay/cms/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue", 
        "./node_modules/preline/dist/*.js",
        "./packages/novay/cms/resources/views/**/*.blade.php",
    ],

    theme: {
        screens: {
            xs: "614px",
            sm: "1002px",
            md: "1022px",
            lg: "1092px",
            xl: "1280px",
        },
        container: {
            center: true,
            padding: "2rem",
            screens: {
                "2xl": "1400px",
            },
        },
        extend: {
            fontFamily: {
                'sans': ['"sf ui display"', ...defaultTheme.fontFamily.sans],
                // 'mono': ['"SofascoreMono"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                border: "hsl(var(--border))",
                input: "hsl(var(--input))",
                ring: "hsl(var(--ring))",
                background: "hsl(var(--background))",
                foreground: "hsl(var(--foreground))",
                primary: {
                    DEFAULT: "hsl(var(--primary))",
                    foreground: "hsl(var(--primary-foreground))",
                },
                secondary: {
                    DEFAULT: "hsl(var(--secondary))",
                    foreground: "hsl(var(--secondary-foreground))",
                },
                destructive: {
                    DEFAULT: "hsl(var(--destructive))",
                    foreground: "hsl(var(--destructive-foreground))",
                },
                muted: {
                    DEFAULT: "hsl(var(--muted))",
                    foreground: "hsl(var(--muted-foreground))",
                },
                accent: {
                    DEFAULT: "hsl(var(--accent))",
                    foreground: "hsl(var(--accent-foreground))",
                },
                popover: {
                    DEFAULT: "hsl(var(--popover))",
                    foreground: "hsl(var(--popover-foreground))",
                },
                card: {
                    DEFAULT: "hsl(var(--card))",
                    foreground: "hsl(var(--card-foreground))",
                },
            },
            borderRadius: {
                xl: "calc(var(--radius) + 4px)",
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
            keyframes: {
                "accordion-down": {
                    from: { height: 0 },
                    to: { height: "var(--radix-accordion-content-height)" },
                },
                "accordion-up": {
                    from: { height: "var(--radix-accordion-content-height)" },
                    to: { height: 0 },
                },
                "collapsible-down": {
                    from: { height: 0 },
                    to: { height: 'var(--radix-collapsible-content-height)' },
                },
                "collapsible-up": {
                    from: { height: 'var(--radix-collapsible-content-height)' },
                    to: { height: 0 },
                },
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
                "collapsible-down": "collapsible-down 0.2s ease-in-out",
                "collapsible-up": "collapsible-up 0.2s ease-in-out",
                "spin-fast": "spin 0.7s linear infinite",
            },
            width: {
                68: "68px",
                88: "88px",
                275: "275px",
                290: "290px",
                350: "350px",
                600: "600px",
            },
        },
    },

    safelist: [
        'lg:table-cell', 
        'min-height-[31.25rem]', 
        'bg-white/80', 
        'grid-cols-5', 
        {
            pattern: /col-span-(2|3|4|5|6|7|8|9|10|11|12)/,
            variants: ['sm'],
        },
        {
            pattern: /w-(28|32|36|40|44|48|52|56|60|64|72|80|96)/
        },
    ],

    plugins: [
        // require("@tailwindcss/forms"),
        require("@tailwindcss/typography"), 
        require("preline/plugin"),
        require("tailwindcss-animate")
    ]
};
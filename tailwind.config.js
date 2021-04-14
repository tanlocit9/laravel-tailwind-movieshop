module.exports = {
    theme: {
        screens: {
            'sm': {'max': '639px'},
            'md': {'max': '767px'},
            'lg': {'max': '1023px'},
            'xl': {'max': '1279px'},
        },
        fontFamily: {
            'sans': ['Ubuntu', 'Sans-serif']
        },
        extend: {
            spacing: {
                '72': '18rem',
                '84': '21rem',
                '96': '24rem',
            },
            inset: {
                '2':'0.5rem',
                '4':'1rem',
                '8':'1.5rem',
            },
            outline: {
                'dash-gray': '2px solid #4B5563',
                'dash-black': '2px solid #000000',
            }
        },

    },
    variants: {
        padding: ['hover'],
        transitions: ['responsive', 'before', 'after', 'hover', 'focus'],
        lineClamp:['responsive', 'hover'],
        cursor: ['hover'],
        inset: ['hover'],
        visibility: ['hover'],
        zIndex: ['responsive', 'hover', 'focus'],
        display: ['responsive', 'group-hover', 'group-focus'],
        borderWidth: ['hover'],
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('tailwindcss-animatecss')({
            settings: {
            animatedSpeed: 1000,
            heartBeatSpeed: 1000,
            hingeSpeed: 2000,
            bounceInSpeed: 750,
            bounceOutSpeed: 750,
            animationDelaySpeed: 1000
            },
            variants: ['responsive'],
        }),
    ],
    corePlugins: {
        // ...
        textOverflow: true,
        }
}

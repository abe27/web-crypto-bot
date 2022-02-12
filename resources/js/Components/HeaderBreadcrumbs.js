import React, { useEffect, useState } from 'react'

const IconTrending = (a) => {
  let element = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      className="icon icon-tabler icon-tabler-line-dashed"
      width={16}
      height={16}
      viewBox="0 0 24 24"
      strokeWidth="2"
      stroke="currentColor"
      fill="none"
      strokeLinecap="round"
      strokeLinejoin="round"
    >
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M5 12h2"></path>
      <path d="M17 12h2"></path>
      <path d="M11 12h2"></path>
    </svg>
  )
  if (a == 'down') {
    element = (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        className="icon icon-tabler icon-tabler-trending-down"
        color='red'
        width={16}
        height={16}
        viewBox="0 0 24 24"
        strokeWidth="2"
        stroke="currentColor"
        fill="none"
        strokeLinecap="round"
        strokeLinejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <polyline points="3 7 9 13 13 9 21 17"></polyline>
        <polyline points="21 10 21 17 14 17"></polyline>
      </svg>
    )
  } else if (a == 'up') {
    element = (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        className="icon icon-tabler icon-tabler-trending-up"
        color='green'
        width={16}
        height={16}
        viewBox="0 0 24 24"
        strokeWidth="2"
        stroke="currentColor"
        fill="none"
        strokeLinecap="round"
        strokeLinejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <polyline points="3 17 9 11 13 15 21 7"></polyline>
        <polyline points="14 7 21 7 21 14"></polyline>
      </svg>
    )
  }

  return element
}

const HeaderBreadcrumbs = ({ dateTimeFromServer = 'DD MM YYYY' }) => {
  const [trendingStatus, setTrendingStatus] = useState('swing')

  useEffect(() => {
    const name = ['swing', 'down', 'up']
    const interval = setInterval(() => {
      let i = Math.round(Math.random() * (name.length - 1))
      setTrendingStatus(name[i])
    }, 2500)

    return () => clearInterval(interval)
  }, [])

  return (
    <>
      <ul className="flex flex-col md:flex-row items-start md:items-center text-gray-600 text-sm mt-3">
        <li className="flex items-center mr-3 mt-3 md:mt-0">
          <span className="mr-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="icon icon-tabler icon-tabler-paperclip"
              width={16}
              height={16}
              viewBox="0 0 24 24"
              strokeWidth="1.5"
              stroke="currentColor"
              fill="none"
              strokeLinecap="round"
              strokeLinejoin="round"
            >
              <path stroke="none" d="M0 0h24v24H0z" />
              <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9 l6.5 -6.5" />
            </svg>
          </span>
          <span>ปกติ</span>
        </li>
        <li className="flex items-center mr-3 mt-3 md:mt-0">
          <span className="mr-2">
            {IconTrending(trendingStatus)}
          </span>
          <span>แนวโน้ม</span>
        </li>
        <li className="flex items-center mt-3 md:mt-0">
          <span className="mr-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="icon icon-tabler icon-tabler-clock"
              width={16}
              height={16}
              viewBox="0 0 24 24"
              strokeWidth="2"
              stroke="currentColor"
              fill="none"
              strokeLinecap="round"
              strokeLinejoin="round"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <circle cx="12" cy="12" r="9"></circle>
              <polyline points="12 7 12 12 15 15"></polyline>
            </svg>
          </span>
          <span>อัพเดทข้อมูลล่าสุดเมื่อ {dateTimeFromServer}</span>
        </li>
      </ul>
    </>
  )
}

export default HeaderBreadcrumbs

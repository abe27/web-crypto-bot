import React, { useEffect, useState } from 'react'
import { Authenticated } from '@/Layouts'
import {
  Breadcrumbs,
  Header,
  Skeletons,
  HeaderBreadcrumbs,
  RefreshAndBack,
} from '@/Components'
import { InterestingTableView } from '@/Components/Interestings'

const Interesting = (props) => {
  const [interestData, setInterestData] = useState(null)
  const [isLoadingRefesh, setLoadingRefresh] = useState(false)

  const getInteresting = () => {
    setLoadingRefresh(true)
    setInterestData(null)

    const interest = [
      {
        asset_id: {
          category_id: {
            title: '',
            description: '',
            is_active: true,
          },
          symbol: '',
          description: '',
          image_url: '',
          is_active: true,
        },
        exchange_id: {
          group_id: {
            title: '',
            description: '',
            is_active: '',
          },
          name: '',
          description: '',
          currency: '',
          exchange_type: '',
          image_url: '',
          is_active: true,
        },
        currency_id: {
          currency: '',
          description: '',
          flag_url: '',
          is_active: true,
        },
        trend: '',
        last_price: '',
        last_percent: '',
        open_order: '',
        is_active: '',
      },
    ]

    setTimeout(() => {
      setInterestData(interest)
      setLoadingRefresh(false)
      console.dir('getInteresting')
    }, 3000)
  }

  useEffect(() => {
    getInteresting()
  }, [])

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={<Breadcrumbs breadcrumbs={props.breadcrumbs} />}
    >
      <Header title={props.title} description={props.description} />
      {/* Page title starts */}
      <div className="">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="my-6 lg:my-2 container mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
            <div>
              <HeaderBreadcrumbs dateTimeFromServer={props.on_date} />
            </div>
            <div className="mt-6 lg:mt-0">
              <RefreshAndBack
                isLoadingRefesh={isLoadingRefesh}
                reloadData={getInteresting}
              />
            </div>
          </div>
          {/* Page title ends */}
          <div className="container mx-auto">
            <div className="w-full rounded">
              {!interestData && <Skeletons />}
              {interestData && <InterestingTableView interesting={interestData} />}
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

export default Interesting
